	
$(function(){
	$(".kategori_gizleme").hide();
	$(".load-screen").hide();
	$(".ana-ekran").show();
	$("#siparis_onay_alert").delay(20000).fadeOut(1000);

	var id_alma=$(".adres-id-al").attr("id"); 
	$("#tablo-adres").load("adres-tablo.php?id="+id_alma);
	$("#adres-tablo-ana").load("adress1.php");
	$("#form-sifre").hide();


	$("#btn-1").click(function(){
		$("#form-ana").hide(1000);
		$("#form-sifre").delay(1000).show(1000);
		$("#alert-da").hide(1000);
	})


	$("body").on("click","#btn-adres-güncelle",function(){
		$.ajax({

			type:"post",
			url:"nebu/production/islem.php", 
			data:$("#form-güncelle").serialize(),
			success:function(döndür){
					Swal.fire({

					icon: 'success',
					title: 'Başarılı bir şekilde güncellendi!',
					showConfirmButton: false,
					timer: 3000
				})
				$("#tablo-adres").load("adres-tablo.php?id="+id_alma);
			}
		})
	})

	$("body").on("click",".sil-id-al",function(){
		var idal=$(this).attr("id");
		Swal.fire({
			title: 'Emin misiniz?',
			text: "Adress bilgisini silerseniz bir daha gözükmeyecektir.Emin misiniz?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'İptal!',
			confirmButtonText: 'Sil!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type:"post",
					url:"nebu/production/islem.php",
					data:{'sil_adres_onay':idal},
					success:function(silcevap){
						$("#adres-tablo-ana").load("adress1.php");

						$("#kayıt-sil").show(1000).delay(2000).hide(1000);


					}

				});

				Swal.fire({

					icon: 'success',
					title: 'Başarılı bir şekilde silindi!',
					showConfirmButton: false,
					timer: 3000
				})
			}
		});

	})

	$("#form-1-button").click(function(){
		$("#banka_1").fadeOut(1000);
		$("#banka_2").delay(1500).fadeIn(1000);

	})

	$(".kategori_gösterme").click(function() {

		var np=	$(this).attr("id");
		$(".kategori_gizleme"+np).toggle(500);
		
	})
})