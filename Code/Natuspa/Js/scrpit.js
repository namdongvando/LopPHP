<p>&nbsp;</p>
<p>&nbsp;</p>
var AnKhung = function(){
			window.localStorage.setItem("hienquancao",false);
		document.getElementById("khung").style.display = "none";		

		}
		
var HienKhung = function(){
		document.getElementById("khung").style.display = "block";
		window.localStorage.setItem("hienquancao",true);
	}
	
	
var DoiMau = function(){
	document.getElementById("khung").style.backgroundColor = "red";
	debugger;
	document.getElementById("khung").style.color 
	= "#fff";
 	
}	
window.onload = function(){

//window.localStorage.setItem("hienquancao",true);
// lấy lần đầu tien
var hienquancao =  window.localStorage.getItem("hienquancao");
console.log(hienquancao);

if(hienquancao == null){
	window.localStorage.setItem("hienquancao",true);	
}
// cập nhật lai 
	hienquancao =  window.localStorage.getItem("hienquancao");
	console.log(hienquancao);
if(hienquancao == "true"){
	HienKhung();
}else{
	AnKhung();	
	
}
	
	}

