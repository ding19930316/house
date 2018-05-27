<?php
class TxtDB //文本数据库类 
{ 
    var $name=''; //文本数据库名 
    var $path=''; //数据库路径 
    var $isError; //出错代码 
    var $dbh; //数据文件dbf指针 
    var $indxh; //索引文件indx指针 
    var $lfth; //闲置空间文件left指针 
    var $lckh; 
    var $rcdCnt=0;//数据库的记录个数 
    var $maxID=0; //数据库已分配的最大ID编号 
    var $leftCnt=0;//闲置空间个数 
    var $DBend=0; //DBF文件末端指针 

    /*初始化函数*/ 

    function TxtDB($name,$path='admin/config/data') 
    { 
        $this->name=$name; 
        $this->path=$path.'/'.$name; 
        $this->isError=0; 
        $path=$this->path; 
        if ($name!='') 
        { 
            @mkdir($this->path,0777);//创建数据库目录 

            //创建或打开数据库文件 
            if (!file_exists($path.'/'.$name.'.tdb')) $this->dbh=fopen($this->path.'/'.$name.'.tdb','w+'); 
            else $this->dbh=fopen($path.'/'.$name.'.tdb','r+'); 
            if (!file_exists($path.'/'.$name.'.indx')) $this->indxh=fopen($this->path.'/'.$name.'.indx','w+'); 
            else $this->indxh=fopen($path.'/'.$name.'.indx','r+'); 
            if (!file_exists($path.'/'.$name.'.lft')) $this->lfth=fopen($this->path.'/'.$name.'.lft','w+'); 
            else $this->lfth=fopen($this->path.'/'.$name.'.lft','r+'); 

            //为保证数据库操作的原子性，对数据进行加锁保护 
            $this->lckh=fopen($this->path.'/'.$name.'.lck','w'); 
            flock($this->lckh,2); 
            fwrite($this->lckh,'lck');//阻塞其它并发进程对数据库的并行操作 

            //获取数据库的相关信息 
            $rcd=$this->getRcd(0);//从indx文件中读取首个记录 
            $this->rcdCnt=$rcd['id']; 
            $this->maxID=$rcd['loc']; 
            $this->DBend=$rcd['len']; 
            $rcd=$this->getLeft(0);//从left文件中读取首个记录 
            $this->leftCnt=$rcd['loc']; 
        } 
        else $this->isError=1; 
    } 

    /*设置indx的定位信息*/ 

    function setRcd($rid,$id,$loc,$len) 
    { 
        fseek($this->indxh,$rid*12); 
        //移动文件指针至记录处 
        $str=pack('III',$id,$loc,$len); 
        //将整数压缩到字符串中 
        fwrite($this->indxh,$str,12); 
        //将定定位信息 ID|LOC|Len 写入indx的第rid个记录 
    } 

    /*获取定位信息*/ 
    function getRcd($rid) 
    { 
        fseek($this->indxh,$rid*12); 
        //移至记录处 
        $str=fread($this->indxh,12); 
        //记取记录 
        $rcd=array(); 
        //将压缩的字符串还原为整数 
        $rcd['id']=str2int($str); 
        $rcd['loc']=str2int(substr($str,4,4)); 
        $rcd['len']=str2int(substr($str,8,4)); 
        return $rcd;//返回第rid个记录的定位信息 
    } 

    /*设置闲置空间记录*/ 
    function setLeft($lid,$loc,$len) 
    { 
        fseek($this->lfth,$lid*8); 
        $str=pack('II',$loc,$len); 
        fwrite($this->lfth,$str,8); 
    } 

    /*记取第lid个闲置空间信息*/ 
    function getLeft($lid) 
    { 
        fseek($this->lfth,$lid*8); 
        $str=fread($this->lfth,8); 
        $rcd['loc']=str2int($str); 
        $rcd['len']=str2int(substr($str,4,4)); 
        return $rcd; 
    } 

    /*结束数据库操作并释放数据加锁*/ 
    function close() 
    { 
        @fclose($this->dbh); 
        @fclose($this->indxh); 
        @fclose($this->lfth); 
        @fclose($this->lckh); 
    } 

    /*从闲置空间中寻找一个大小最少为len的空间 
    使用最佳适用法 */ 
    function seekSpace($len) 
    { 
        $res=array('loc'=>0,'len'=>0); 
        if ($this->leftCnt<1) return $res; 
        //没有闲置空间 
        $find=0; 
        $min=1000000; 
        //遍历所有闲置空间信息 
        for ($i=$this->leftCnt;$i>0;$i--) 
        { 
            $res=$this->getLeft($i); 
            //找寻到大小刚好合适的空间 
            if ($res['len']==$len) {$find=$i;break;} 
            //找到可用的闲置空间 
            else if($res['len']>$len) 
            { 
                //力图找到一个最合适的空间 
                if ($res['len']-$len<$min) 
                { 
                    $min=$res['len']-$len; 
                    $find=$i; 
                } 
            } 
        } 
        if ($find) 
        { 
            //找到了合适的闲置空间 
            //读取闲置空间信息 
            $res=$this->getLeft($find); 

            //用left文件删除此闲置空间的记录信息 
            fseek($this->lfth,($find+1)*8); 
            $str=fread($this->lfth,($this->leftCnt-$find)*8); 
            fseek($this->lfth,$find*8); 
            fwrite($this->lfth,$str); 

            //更新闲置空间记录数 
            $this->leftCnt--; 
            $this->setLeft(0,$this->leftCnt,0); 

            //返回获得的闲置空间结果 
            return $res; 
        } 
        else //失败返回 
        { 
            $res['len']=0; 
            return $res; 
        } 
    } 


    /*插入记录至数据库content为记录内容,len限定记录的长度*/ 
    function insert($content,$len=0) 
    { 
        $res=array('loc'=>0); 
        //记录长度没有指定则根据数据实际长度指定 
        if (!$len) $len=strlen($content);  

        //试图从闲置空间中获取一块可用的空间 
        if ($this->leftCnt) $res=$this->seekSpace($len); 
        if (!$res['len']) 
        { 
            //没有找到可用的闲置空间则从数据文件末端分配空间 
            $res['loc']=$this->DBend; 
            $res['len']=$len; 
        } 

        //更新数据文件末端指针 
        if ($res['loc']+$res['len']>$this->DBend) $this->DBend=$res['loc']+$res['len']; 

        $this->maxID++;//更新最大ID编号 
        $this->rcdCnt++;//更新数据库记录个数 
        //将更新永久写入数据库 
        $this->setRcd(0,$this->rcdCnt,$this->maxID,$this->DBend); 
        $this->setRcd($this->rcdCnt,$this->maxID,$res['loc'],$res['len']); 

        //将实际数据写入从dbf分配的空间处 
        fseek($this->dbh,$res['loc']); 
        fwrite($this->dbh,$content,$len); 
        //成功返回新记录的编号 
        return $this->maxID; 
    } 

    /*寻找编号为ID的记录在数据库中的位置编号N*/ 
    /*因为ID编号在indx中升序排列可使用二分查找大大提高查询速度*/ 
    function findByID($id) 
    { 
        //数据库中没有记录或者编号超过当前最大ID编号 
        if ($id<1 or $id>$this->maxID or $this->rcdCnt<1) return 0; 

        $left=1; 
        $right=$this->rcdCnt; 
        while($left<$right)//实施二分查找 
        { 
            $mid=(int)(($left+$right)/2); 
            if ($mid==$left or $mid==$right) break; 
            $rcd=$this->getRcd($mid); 
            if ($rcd['id']==$id) return $mid; 
            else if($id<$rcd['id']) $right=$mid; 
            else $left=$mid; 
        } 
        $rcd=$this->getRcd($left); 
        if ($rcd['id']==$id) return $left; 
        $rcd=$this->getRcd($right); 
        if ($rcd['id']==$id) return $right; 
        //查找成功返回位置编号N 
        return 0;//失败返回0 
    } 

    /*从数据库中删除编号为ID的记录*/ 
    function delete($id) 
    { 
        //查找此记录在数据库中的位置编号 
        $rid=$this->findByID($id); 
        if (!$rid) return;//不存在ID号为id的记录 

        $res=$this->getRcd($rid);//获取此记录的定位信息 

        //从索引文件中删除此记录的定位信息 
        fseek($this->indxh,($rid+1)*12); 
        $str=fread($this->indxh,($this->rcdCnt-$i)*12); 
        fseek($this->indxh,$rid*12); 
        fwrite($this->indxh,$str); 

        //更新数据库记录个数并永久写入数据库 
        $this->rcdCnt--; 
        $this->setRcd(0,$this->rcdCnt,$this->maxID,$this->DBend); 

        //将此记录在dbf所占用的空间登记到闲置空间队列 
        $this->leftCnt++; 
        $this->setLeft(0,$this->leftCnt,0); 
        $this->setLeft($this->leftCnt,$res['loc'],$res['len']); 
    } 

    /*更新ID编号为id的记录内容*/ 
    /*len用于重新限定记录的内容*/ 
    function update($id,$newcontent,$len=0) 
    { 
        //将ID编号转化为位置编号N 
        $rid=$this->findByID($id); 
        if (!$rid) return;//不存的ID编号 

        if (!$len) $len=strlen($newcontent);  

        //获取此记录定位信息 
        $rcd=$this->getRcd($rid); 
        //更新的内容长度超出记录原来分配的空间 
        if ($rcd['len']<$len) 
        { 
            //放弃原空间并将此空间录入闲置空间队列 
            $this->leftCnt++; 
            $this->setLeft(0,$this->leftCnt,0); 
            $this->setLeft($this->leftCnt,$rcd['loc'],$rcd['len']); 

            //在dbf末端为此记录重新分配空间 
            $rcd['loc']=$this->DBend; 
            $rcd['len']=$len; 
            $this->DBend+=$len; 
            //更新数据库信息 
            $this->setRcd(0,$this->rcdCnt,$this->maxID,$this->DBend); 
            $this->setRcd($rid,$rcd['id'],$rcd['loc'],$rcd['len']); 
        } 
        //写入新数据 
        fseek($this->dbh,$rcd['loc']); 
        fwrite($this->dbh,$newcontent,$len); 
    } 

    /*根据位置编号获取记录内容*/ 
    function selectByRid($rid) 
    { 
        //数据以ID编号与实际数据content二元组返回 
        $res=array('id'=>0,'content'=>''); 
        //错误的位置编号 
        if ($rid<1 or $rid>$this->rcdCnt) return $res; 
        //读取定位信息 
        else $rcd=$this->getRcd($rid); 
        $res['id']=$rcd['id']; 
        $res['len']=$rcd['len']; 
        //根据定位信息从dbf中读取实际数据 
        fseek($this->dbh,$rcd['loc']); 
        $res['content']=fread($this->dbh,$rcd['len']); 
        return $res; 
    } 

    /*根据ID编号获取记录内容*/ 
    function select($id) 
    { 
        //将ID编号转换成位置编号再调用上面的函数 
        return $this->selectByRid($this->findByID($id)); 
    } 

    /*数据库备份*/ 
    function backup() 
    { 
        copy($this->path.'/'.$this->name.'.tdb',$this->path.'/'.$this->name.'.tdb.bck'); 
        copy($this->path.'/'.$this->name.'.indx',$this->path.'/'.$this->name.'.indx.bck'); 
        copy($this->path.'/'.$this->name.'.lft',$this->path.'/'.$this->name.'.lft.bck'); 
    } 

    /*从备份中恢复*/ 
    function recover() 
    { 
        copy($this->path.'/'.$this->name.'.tdb.bck',$this->path.'/'.$this->name.'.tdb'); 
        copy($this->path.'/'.$this->name.'.indx.bck',$this->path.'/'.$this->name.'.indx'); 
        copy($this->path.'/'.$this->name.'.lft.bck',$this->path.'/'.$this->name.'.lft'); 
    } 

    /*清除数据库*/ 
    function mydrop() 
    {
        @unlink($this->path.'/'.$this->name.'.tdb'); 
        @unlink($this->path.'/'.$this->name.'.indx'); 
        @unlink($this->path.'/'.$this->name.'.lft');  
    } 

    /*清空数据库记录*/ 
    function myreset() 
    { 
        setRcd(0,0,0); 
        setLeft(0,0); 
    } 
} 

?> 

