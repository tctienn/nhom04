
var a=
[
    'imgslide/slide (1).png',
    'imgslide/slide (2).png',
    'imgslide/slide (3).png'
];
var aa=-1;
var imgt;
var img = document.getElementById('imgslide');
function chuenanh()
{
    

    aa++;
    if(aa>a.length-1)
    {aa=0;}
    imgt=a[aa];
    
    return img.setAttribute('src',imgt);
   
}
setInterval(function(){
    chuenanh();
}, 3000);

// setTimeout(
//     function()
//         {
//             chuenanh(), alert("Chào mừng bạn đến với freetuts.net");
//         }, 1000
//     );



// setTimeout(function(){
//     alert("Chào mừng bạn đến với freetuts.net");
// }, 4000);


/*var a=0;

var aa= document.getElementsByClassName("div32")[0].clientWidth;

var img=document.getElementById("chuyenimg");
function chuenanh()
{
    a += aa;
    
    img.style.marginLeft='-' + a +'px';
}
*/