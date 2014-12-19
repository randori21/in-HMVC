
		var servicegambarURL = "http://localhost/adminProject/index.php/service/gambar/";
		var x=0;

		$("#gambar").bind("pageinit", function(event) {
			gambar_read();
		});

		function gambar_read() {
			$.getJSON(servicegambarURL + "gambar_read", function(data) {
				$("#listgambar li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listgambar").append(
						"<li ><a href='#details_gambar' id='krm' data-krm="+ isi.gambar_id +" onclick='gambar_edit("+isi.gambar_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.gambar_nama + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='gambar_del("+ isi.gambar_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.gambar_id +">" +
						"</li>");
				});
				$("#listgambar").listview("refresh");
			});
		}
		function gambar_add(){	
			try {	
					console.log("buat baru");
				
						$("#gambar_id").val("");
						$("#gambar_nama").val("");
						$("#gambar_file").val("");
						$("#gambar_alt").val("");
						$("#gambar_post").val("");
						$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");
						post_refresh();
						post_sub("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function gambar_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicegambardetailsURL+"gambar_id_search", {
				"gambar_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#gambar_id").val(field.gambar_id);
						$("#gambar_nama").val(field.gambar_nama);
						$("#gambar_file").val(field.gambar_file);
						$("#gambar_alt").val(field.gambar_alt);
						$("#gambar_post").val(field.gambar_post);
						post_refresh();
						post_sub(field.post_post_id);														
						if(field.POST_STATUS == 1){
							$("#stat").attr( "checked",true );
							$("label.ui-btn.ui-corner-all.ui-btn-inherit.ui-btn-icon-left").removeClass("ui-checkbox-off");
							$("label.ui-btn.ui-corner-all.ui-btn-inherit.ui-btn-icon-left").addClass( "ui-checkbox-on" );
							$(".ui-slider-label.ui-slider-label-a.ui-btn-active" ).css({"width":"100%"});
							$(".ui-slider-label.ui-slider-label-b" ).css({"width":"0"});
							$("a.ui-slider-handle.ui-slider-handle-snapping.ui-btn.ui-shadow" ).attr({"aria-valuenow":"on","aria-valuetext":"On","title":"On"} );
							$("a.ui-slider-handle.ui-slider-handle-snapping.ui-btn.ui-shadow" ).css({"left":"100%"});									
						}
					});
				}, "json");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}

		function gambar_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicegambarURL + "gambar_del", {
						"gambar_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							gambar_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#gambar";					
						}else {
							$("#status").show();
							$("#status").html("<span style='font-size: 10px;'>Coba lagi!</span>");							
						}
					}, "json");
				}catch(e){	  
					alert("isi:"+e);
				}
			}
		}
		function gambar_sub(a){
			try {
				isi="pilihan gambar";
				$.post(servicegambarURL + "gambar_read", {
					"gambar_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.gambar_id;
					nama = fieldsub.gambar_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#gambar_gambar_id").append("<option value="+id+">"+nama+"</option>");
					$("#gambar_gambar_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#gambar_gambar_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function gambar_refresh(){			
			$("#gambar_gambar_id option").remove();
			$("#gambar_gambar_id-menu li").remove();
		}
		