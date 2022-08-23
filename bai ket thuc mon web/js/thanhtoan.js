var a='';
var aa=1;
var aaa=245000;

//document.getElementById('giatri').innerHTML='1';
//alert('hm');
function dieuchinh(a)
{
   
        
    if(a=='t')
        {
            aa++;
            aaa=aaa+245000;
        }
    //document.getElementById('giatri').innerHTML=aa;

        //alert(aa);
    if(a=='g')
    {
        if(aa<=0)
            alert('số sản phẩm quá nhỏ');
        else
        {
            aa--;
            aaa=aaa-245000;
        }
    }
    document.getElementById('giatri').innerHTML=aa;
    document.getElementById('giasp').innerHTML=aaa;
    document.getElementById('allgia').innerHTML=aaa;

}

function co()
{
    alert('OK, người anh em thiện lành');
    document.getElementById('codon').style.display='none';
}
function no()
{
    
    document.getElementById('codon').style.display='none';
}
function andon()
{
    document.getElementById('codon').style.display='block';
}
