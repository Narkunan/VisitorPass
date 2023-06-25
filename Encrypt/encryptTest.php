<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
require("ende.php");
class encryptTest extends TestCase
{
    
    public static function dataProviderNameEncrypt()
    {
        return [["narkunan","qdunxqdq",3],
        ["tharun","wkduxq",3],
        ["php","tlt",4]];
    }
    public static function dataProviderNameDecrypt()
    {
        return [["qdunxqdq","narkunan",3],
        ["wkduxq","tharun",3],
        ["tlt","php",4]];
    }
    public static function dataProviderContactEncrypt()
    {

       return [["9585965815","aocoakocwo"],
       ["9858596964","acocoakakq"],
       ["8558855815","cooccoocwo"]];
    }

      public static function dataProviderContactDecrypt()
  {

return [["aocoakocwo","9585965815"],
       ["acocoakakq","9858596964"],
       ["cooccoocwo","8558855815"]];

  }

  public static function dataProviderCardNoEncrypt()
  {

    return [["cbfpn0q","feisq0t"],
    ["fpn0qn","isq0tq"],
    ["pngimg663","sqjlpj663"]];
  }

public static function dataProviderCardNoDecrypt()
  {

    return [["feisq0t","cbfpn0q"],
    ["isq0tq","fpn0qn"],
    ["sqjlpj663","pngimg663"]];
  }

  #[DataProvider("dataProviderContactDecrypt")]
  public function testdecryptContact($actual,$expected)
  {
        $obj=new Temp();
        $encrypted=$obj->decryptContact($actual);
        $this->assertSame($expected,$encrypted);
}

#[DataProvider("dataProviderNameEncrypt")]
public function testencrypt(string $actual,String $expected,int $sk)
{
  $obj=new Temp();
  $encrypted=$obj->encrypt($actual,$sk);  
 $this->assertSame($expected,$encrypted);
  
}

#[DataProvider("dataProviderContactEncrypt")]
public function testContactEncrypt($actual,$expected)
{
    $obj=new Temp();
    $encrypted=$obj->vContactEncrypt($actual);
    $this->assertSame($expected,$encrypted);
}
#[DataProvider("dataProviderNameDecrypt")]
public function testdecrypt($decrypt,$name,$sk)
{
    $obj=new Temp();
    $encrypted=$obj->decrypt($decrypt,$sk);
   $this->assertSame($name,$encrypted);
}
#[DataProvider("dataProviderCardNoEncrypt")]
public function testencryptCardNo($actual,$expected)
{
    $obj=new Temp();
    $encrypted=$obj->encryptCardNo($actual,3);
     $this->assertSame($expected,$encrypted);
 }

#[DataProvider("dataProviderCardNoDecrypt")]
public function testdecryptCardNo($actual,$expected)
{
   $obj=new Temp();
   $encrypted=$obj->decryptCardNo($actual,3);
  $this->assertSame($expected,$encrypted);   
 }
}
    

?>