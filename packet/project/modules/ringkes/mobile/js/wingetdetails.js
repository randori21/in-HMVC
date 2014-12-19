
		var servicewingetdetailsURL = "http://localhost/adminProject/index.php/service/winget/";
		var x=0;

		$("#wingetdetailsPage").bind("pageinit", function(event) {
			winget_read();
		});
		
		$("#winget_kirim").click(function(){
			var winget_id = $("#winget_id").val();
			
			var winget_nama = $("#winget_nama").val();
			
			var winget_file = $("#winget_file").val();
						
			var winget_status = $("[name='winget_status']:checked").val();
			
			var winget_posisi = $("#winget_posisi").val();
			
			var winget_keterangan = $("#winget_keterangan").val();
			
			var jnsusr_jnsusr_id = $("#jnsusr_jnsusr_id").val();
						
			var uri = "";
			if(winget_id ==""){
				if((winget_nama !=="")&&(winget_nama!== null)){
					uri = servicewingetdetailsURL+"winget_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicewingetdetailsURL+"winget_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"winget_id": winget_id,

						"winget_nama": winget_nama,

						"winget_file": winget_file,

						"winget_status": winget_status,

						"winget_posisi": winget_posisi,

						"winget_keterangan": winget_keterangan,

						"jnsusr_jnsusr_id": jnsusr_jnsusr_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							winget_read();
							window.location.href = "index.html#winget";
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
		