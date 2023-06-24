<?php
interface Prototype
{
	public function getclone();
}
class studentrecord implements Prototype
{
	public $sname="nark";
	public $grade=10;
	public function showRecord()
	{
		echo $this->sname ."".$this->grade;
	} 
    
    public function getclone()
    {
     
return new studentrecord($this->sname,$this->grade);

    }
}

	$studentrec=new studentrecord();
	$obj=$studentrec->getclone();
	echo $obj->showRecord();

  ?>