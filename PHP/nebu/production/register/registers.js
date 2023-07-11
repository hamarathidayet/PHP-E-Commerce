$(function(){



	$("#sifre").keyup(function(event){
		var a = $("#sifre").val().length;
		



		if (a>14) {
			
			
			$("#selam").html("Şifreniz en fazla 14 karakter olması lazım...!");
			$("#selam").css({"color":"orange"});
			$("#kayıt-button").attr("type","button");
		}
		else if(a>0 && 8>a){
			$("#selam").html("Şifreniz güçlü olmalıdır");
			$("#selam").css({"color":"orange"});
			$("#kayıt-button").attr("type","button");



		}
		else if(a>7 && 14>a){
			$("#selam").html("Şifreniz güçlü !");
			$("#selam").css({"color":"green"});
			$("#kayıt-button").attr("type","submit");
		}
		
	})

})
