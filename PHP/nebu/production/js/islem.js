$("body").on("click",".bas",function(){

	var ön_düzen= $(this).attr("id");
	var parent =$(this).parent("td").parent("tr");


	$.ajax({
		type:"post",
		url:"islem.php",
		data:{'ön_düzen':ön_düzen},
		success:function(silcevap){
			

		}
	})

})


$("body").on("click",".yorum",function(){
	var yorum_id = $(this).attr("id");
	
	
	var parent=$(this).parent("td").parent("tr");

	$.ajax({
		type:"post",
		url:"islem.php",
		data:{"yorum_onay":yorum_id},

	})
})

$("#_kategori").change(function() {
	var deger= this.value;
	var böl = deger.split(" ");
	var id= (böl[1]);

	$.ajax({
		type:"post",
		url:"islem.php",
		data:{"alt_ketegori_id":id}, 
		success:function(cevap) {
			$(".alt_kategori_listeleme").remove();
			var an=cevap.split("x");
			var nba=an[0].split(",");
			var id_kt=an[1].split("-");
			
			
			for (var i = 1; i < nba.length; i++) {
				$('#alt_kategori').append($('<option class="alt_kategori_listeleme"></option>').html(nba[i]).val(id_kt[i]));
			}
			
		}

	})
})

$("#tikla_unut").click(function(){
	$("#giris_ayar").hide(1000);
	$("#unut_sifre").delay(1100).show(1000);
})

$("#tikla_giris").click(function(){
	$("#unut_sifre").hide(1000);
	$("#giris_ayar").delay(1100).show(1000);
})