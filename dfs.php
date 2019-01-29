<?php
/*     1
 *    / \
 *   2   3___
 *  / \  | \ \
 * 4   5 6  7 8
 *
 */
 
$ar[1]['parent']=0;
$ar[1]['value']=1;
$ar[1]['nama']='Agus';
$ar[1]['posisi']='Ketua';
 
$ar[2]['parent']=1;
$ar[2]['value']=2;
$ar[2]['nama']='Novan';
$ar[2]['posisi']='Wakil 1';
 
$ar[3]['parent']=1;
$ar[3]['value']=3;
$ar[3]['nama']='Budi';
$ar[3]['posisi']='Wakil 2';
 
$ar[4]['parent']=2;
$ar[4]['value']=4;
$ar[4]['nama']='Syauqil';
$ar[4]['posisi']='Anggota';
 
$ar[5]['parent']=2;
$ar[5]['value']=5;
$ar[5]['nama']='Aji';
$ar[5]['posisi']='Anggota';
 
$ar[6]['parent']=3;
$ar[6]['value']=6;
$ar[6]['nama']='Wildan';
$ar[6]['posisi']='Anggota';
 
$ar[7]['parent']=3;
$ar[7]['value']=7;
$ar[7]['nama']='Ni\'am';
$ar[7]['posisi']='Anggota';
 
$ar[8]['parent']=3;
$ar[8]['value']=8;
$ar[8]['nama']='Bayu';
$ar[8]['posisi']='Anggota';
 
function dfs($arr,$parent,$base)
{
 global $explc;
 global $explv;
 $explc++;
 
 for($a=1; $a<=count($arr); $a++)
{
  if($parent==0){
   $explv[$explc]['parent'] = $arr[$a-1]['parent'];
   $explv[$explc]['value'] = $arr[$a-1]['value'];
   $explv[$explc]['nama'] = $arr[$a-1]['nama'];
   $explv[$explc]['posisi'] = $arr[$a-1]['posisi'];
 
   $explv[$explc]['base'] = $base;
  }
  if($arr[$a]['parent']==$parent)
{
   $explv[$explc]['parent'] = $arr[$a]['parent'];
   $explv[$explc]['value'] = $arr[$a]['value'];
   $explv[$explc]['nama'] = $arr[$a]['nama'];
   $explv[$explc]['posisi'] = $arr[$a]['posisi'];
   $explv[$explc]['base'] = $base;
   $base++;
   dfs($arr,$arr[$a]['value'],$base);
   $base--;
  }
 }
}
 
function menjorok($jumlah,$tanda)
{
 for($a=0;$a<$jumlah;$a++) echo $tanda;
}
 
echo "\n";
global $explv,$explc;
$explc = -1;
dfs($ar,0,0);
 for($a=0; $a<$explc; $a++)
{
 echo menjorok($explv[$a]['base'],' ').$explv[$a]['nama']." (".$explv[$a]['posisi'].")\n";
}
unset($explc);
unset($explv);

/*
Berdasarkan teori DFS, yang dicari berawal simpul terdalam / paling awal terlebih dahulu.
Kemudian merambat satu-persatu ke simpul paling ujung, sehingga mode pencariaannya adalah menurun.
•	Dari Agus, dicek mempunyai dua bawahan.
•	Bawahan Agus pertama, namanya Novan, dicek mempunyai dua bawahan juga.
•	Periksa bawahan Novan pertama, namanya Syauqil, dicek, Syauqil adalah posisi paling bawah / ujung.
•	Periksa bawahan Novan kedua, namanya Aji, dicek, Aji adalah posisi paling  bawah sekaligus terakhir.
•	Kemudian bawahan Agus yang kedua, namanya Budi, dicek dan mempunyai tiga bawahan.
•	Bawahan pertama Budi adalah Wildan, setelah dicek, tidak mempunyai bawahan lagi.
•	Bawahan kedua Budi adalah Ni’am, setelah dicek, tidak mempunyai bawahan lagi.
•	Bawahan ketiga Budi adalah Bayu, setelah dicek, tidak mempunyai bawahan dan sekaligus akhir dari pencarian.
*/


?>
