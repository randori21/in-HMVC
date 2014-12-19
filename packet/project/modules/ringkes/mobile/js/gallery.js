
		var servicegalleryURL = "http://localhost/adminProject/index.php/service/gallery/";
		var x=0;

		$("#gallery").bind("pageinit", function(event) {
			gallery_read();
		});

		function gallery_read() {
			$.getJSON(servicegalleryURL + "gallery_read", function(data) {
				$("#listgallery li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listgallery").append(
						"<li ><a href='#details_gallery' id='krm' data-krm="+ isi.gallery_id +" onclick='gallery_edit("+isi.gallery_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.gallery_nama + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='gallery_del("+ isi.gallery_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.gallery_id +">" +
						"</li>");
				});
				$("#listgallery").listview("refresh");
			});
		}
		function gallery_add(){	
			try {	
					console.log("buat baru");
				
						$("#gallery_id").val("");
						$("#gallery_nama").val("");
						$("#gallery_thumb").val("");
						$("#gallery_keterangan").val("");
						$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");
						jnsusr_refresh();
						jnsusr_sub("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function gallery_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicegallerydetailsURL+"gallery_id_search", {
				"gallery_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#gallery_id").val(field.gallery_id);
						$("#gallery_nama").val(field.gallery_nama);
						$("#gallery_thumb").val(field.gallery_thumb);
						$("#gallery_keterangan").val(field.gallery_keterangan);
						jnsusr_refresh();
						jnsusr_sub(field.jnsusr_jnsusr_id);														
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

		function gallery_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicegalleryURL + "gallery_del", {
						"gallery_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							gallery_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#gallery";					
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
		function gallery_sub(a){
			try {
				isi="pilihan gallery";
				$.post(servicegalleryURL + "gallery_read", {
					"gallery_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.gallery_id;
					nama = fieldsub.gallery_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#gallery_gallery_id").append("<option value="+id+">"+nama+"</option>");
					$("#gallery_gallery_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#gallery_gallery_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function gallery_refresh(){			
			$("#gallery_gallery_id option").remove();
			$("#gallery_gallery_id-menu li").remove();
		}
		