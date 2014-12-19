
		var servicemediaURL = "http://localhost/adminProject/index.php/service/media/";
		var x=0;

		$("#media").bind("pageinit", function(event) {
			media_read();
		});

		function media_read() {
			$.getJSON(servicemediaURL + "media_read", function(data) {
				$("#listmedia li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listmedia").append(
						"<li ><a href='#details_media' id='krm' data-krm="+ isi.media_id +" onclick='media_edit("+isi.media_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.media_nama + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='media_del("+ isi.media_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.media_id +">" +
						"</li>");
				});
				$("#listmedia").listview("refresh");
			});
		}
		function media_add(){	
			try {	
					console.log("buat baru");
				
						$("#media_id").val("");
						$("#media_nama").val("");
						$("#media_file").val("");
						$("#media_alt").val("");
						$("#media_post").val("");
						$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");
						post_refresh();
						post_sub("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function media_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicemediadetailsURL+"media_id_search", {
				"media_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#media_id").val(field.media_id);
						$("#media_nama").val(field.media_nama);
						$("#media_file").val(field.media_file);
						$("#media_alt").val(field.media_alt);
						$("#media_post").val(field.media_post);
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

		function media_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicemediaURL + "media_del", {
						"media_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							media_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#media";					
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
		function media_sub(a){
			try {
				isi="pilihan media";
				$.post(servicemediaURL + "media_read", {
					"media_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.media_id;
					nama = fieldsub.media_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#media_media_id").append("<option value="+id+">"+nama+"</option>");
					$("#media_media_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#media_media_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function media_refresh(){			
			$("#media_media_id option").remove();
			$("#media_media_id-menu li").remove();
		}
		