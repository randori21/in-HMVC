
		var serviceletakdetailsURL = "http://localhost/adminProject/index.php/service/letak/";
		var x=0;

		$("#letakdetailsPage").bind("pageinit", function(event) {
			letak_read();
		});
		
		$("#letak_kirim").click(function(){
			var letak_id = $("#letak_id").val();
			
			var letak_nama = $("#letak_nama").val();
			
			var letak_keterangan = $("#letak_keterangan").val();
			
			var jnsmenu_jnsmenu_id = $("#jnsmenu_jnsmenu_id").val();
						
			var uri = "";
			if(letak_id ==""){
				if((letak_nama !=="")&&(letak_nama!== null)){
					uri = serviceletakdetailsURL+"letak_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = serviceletakdetailsURL+"letak_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"letak_id": letak_id,

						"letak_nama": letak_nama,

						"letak_keterangan": letak_keterangan,

						"jnsmenu_jnsmenu_id": jnsmenu_jnsmenu_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							letak_read();
							window.location.href = "index.html#letak";
						}else {
							$("#status").show();
							$("#status").html('<span style="font-size: 10px;">Coba lagi!</span>');							
						}
					}, "json");
				}catch(e){	  
					console.log("isi:"+e);
				}
			}
		});
		