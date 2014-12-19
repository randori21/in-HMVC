
		var servicehakdetailsURL = "http://localhost/adminProject/index.php/service/hak/";
		var x=0;

		$("#hakdetailsPage").bind("pageinit", function(event) {
			hak_read();
		});
		
		$("#hak_kirim").click(function(){
			var hak_id = $("#hak_id").val();
						
			var hak_status = $("[name='hak_status']:checked").val();
			
			var jnsusr_jnsusr_id = $("#jnsusr_jnsusr_id").val();
						
			var uri = "";
			if(hak_id ==""){
				if((hak_nama !=="")&&(hak_nama!== null)){
					uri = servicehakdetailsURL+"hak_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicehakdetailsURL+"hak_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"hak_id": hak_id,

						"hak_status": hak_status,

						"jnsusr_jnsusr_id": jnsusr_jnsusr_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							hak_read();
							window.location.href = "index.html#hak";
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
		