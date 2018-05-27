<?php
include_once(AJ_ROOT."/admin/config/fun.php");
include_once(AJ_ROOT."/admin/config/txtdb.php");

function mytime()
{
 return time();
}

class myArt
{
  var $name='';
  var $cnt=0;
  var $test;
  var $error=0;
  var $indx=array('title','robotid','listid','listname','ispub','robottime','tid','huid');
  function myArt($name)
  {
    $this->name=$name;
	$head=new TxtDB($name.'_h');
	$head->close();
	$this->cnt=$head->rcdCnt;
	$txt=new TxtDB($name.'_t');
	$txt->close();
	if ($head->rcdCnt!=$txt->rcdCnt) $this->error=1;
  }
  function newArt($rcd,$rcdt)
  {
    $rcdt[tid]=$this->newText($rcd);
	if (!$rcdt[tid]) return 0;
	$rcdt[robottime]=mytime();
	$rcdt[huid]=0;
	$rcdt[id]=$this->newHead($rcdt);
	if (!$rcdt[id]) $this->delText($rcdt[tid]);
	return $rcdt[id];
  }
  function newText($rcd)
  {
    $txt=new TxtDB($this->name.'_t');
	$content=allExplode('[!]',$rcd);
	$id=$txt->insert($content,strlen($content)+10);
	$txt->close();
	return $id;
  }
  function newHead($rcd)
  {
    $head=new TxtDB($this->name.'_h');
	$content=unExplode('[!]',$this->indx,$rcd);
	//echo $content;
	$id=$head->insert($content,128);
	$head->close();
	return $id;
  }
  function delText($tid)
  {
    $txt=new TxtDB($this->name.'_t');
	$txt->delete($tid);
	$txt->close();
  }
  function getHead($hid)
  {
    $rcd=array('id'=>0);
    $head=new TxtDB($this->name.'_h');
	$res=$head->select($hid);
	$head->close();
	if (!$res[id]) return $rcd;
	$rcd=myExplode('[!]',$this->indx,$res[content]);
	$rcd[id]=$res[id];
	return $rcd;
  }
  function update_Head($hid,$rcd)
  {
    $head=new TxtDB($this->name.'_h');
	$content=unExplode('[!]',$this->indx,$rcd);
	$head->update($hid,$content,128);
	$head->close();    
  }
  function delArt($id)
  {
    $rcd=$this->getHead($id);
	$this->delHead($rcd[id]);
	$this->delText($rcd[tid]);
	return $rcd;
  }
  function delHead($hid)
  {
    $head=new TxtDB($this->name.'_h');
	$head->delete($hid);
	$head->close();
  }

  
  function addCnt($hid,$read,$reply)
  {
    $head=new TxtDB($this->name.'_h');
	$res=$head->select($hid);
	$rcd=myExplode('[!]',$this->indx,$res[content]);
	$rcd[readCnt]+=$read;
	$rcd[replyCnt]+=$reply;
	$content=unExplode('[!]',$this->indx,$rcd);
	$head->update($hid,$content,128);
	$head->close();
  }
  function setPsw($hid,$psw)
  {
    $head=new TxtDB($this->name.'_h');
	$res=$head->select($hid);
	$rcd=myExplode('[!]',$this->indx,$res[content]);
	if ($psw==-1) $rcd[psw]=-1;
    else if ($psw) $rcd[psw]=rand(10000,99999);
	else $rcd[psw]=0;
	$content=unExplode('[!]',$this->indx,$rcd);
	$head->update($hid,$content,128);
	$head->close();
  }
  function getHeadByRid($hid)
  {
    $rcd=array('id'=>0);
    $head=new TxtDB($this->name.'_h');
	$res=$head->selectByRid($hid);
	$head->close();
	if (!$res[id]) return $rcd;
	$rcd=myExplode('[!]',$this->indx,$res[content]);
	$rcd[id]=$res[id];
	return $rcd;
  } 
  function getText($tid)
  {
    $rcd=array('id'=>0);
    $txt=new TxtDB($this->name.'_t');
	$res=$txt->select($tid);
	$txt->close();
	if (!$res[id]) return $rcd;
	$rcd=myExplode('[!]',$this->indx1,$res[content]);
	$rcd[id]=$res[id];
	return $rcd;
  }
  function getTextByRid($tid)
  {
    $rcd=array('id'=>0);
    $txt=new TxtDB($this->name.'_t');
	$res=$txt->selectByRid($tid);
	$txt->close();
	if (!$res[id]) return $rcd;
	$rcd=myExplode('[!]',$this->indx1,$res[content]);
	$rcd[id]=$res[id];
	return $rcd;
  }
  function updateText($tid,$rcd)
  {
    $txt=new TxtDB($this->name.'_t');
	$content=unExplode('[!]',$this->indx1,$rcd);
	$txt->update($tid,$content);
	$txt->close();    
  }
  
  function getArt($id)
  {
    $rcd=$this->getHead($id);
	$id=$rcd[id];
	$rcd=$rcd+$this->getText($rcd[tid]);
	$rcd[id]=$id;
	return $rcd;
  }
  function getArtByRid($rid)
  {
    $rcd=$this->getHeadByRid($rid);
	$id=$rcd[id];
	$rcd=$rcd+$this->getText($rcd[tid]);
	$rcd[id]=$id;
	return $rcd;  
  }
}

?>
