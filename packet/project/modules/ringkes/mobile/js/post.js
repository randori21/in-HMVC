
		var servicepostURL = "http://localhost/adminProject/index.php/service/post/";
		var x=0;

		$("#post").bind("pageinit", function(event) {
			post_read();
		});

		function post_read() {
			$.getJSON(servicepostURL + "post_read", function(data) {
				$("#listpost li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listpost").append(
						"<li ><a href='#details_post' id='krm' data-krm="+ isi.post_id +" onclick='post_edit("+isi.post_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.post_author + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='post_del("+ isi.post_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.post_id +">" +
						"</li>");
				});
				$("#listpost").listview("refresh");
			});
		}
		function post_add(){	
			try {	
					console.log("buat baru");
				
						$("#post_id").val("");
						$("#post_author").val("");
						$("#post_date").val("");
						$("#post_date_edit").val("");
						$("#post_nama").val("");
						$("#post_content").val("");
						$("#post_keywords").val("");
						$("#post_status").val("");
						$("#post_tag").val("");
						$("#post_picture").val("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function post_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicepostdetailsURL+"post_id_search", {
				"post_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#post_id").val(field.post_id);
						$("#post_author").val(field.post_author);
						$("#post_date").val(field.post_date);
						$("#post_date_edit").val(field.post_date_edit);
						$("#post_nama").val(field.post_nama);
						$("#post_content").val(field.post_content);
						$("#post_keywords").val(field.post_keywords);
						$("#post_status").val(field.post_status);
						$("#post_tag").val(field.post_tag);
						$("#post_picture").val(field.post_picture);														
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

		function post_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicepostURL + "post_del", {
						"post_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							post_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#post";					
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
		function post_sub(a){
			try {
				isi="pilihan post";
				$.post(servicepostURL + "post_read", {
					"post_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.post_id;
					nama = fieldsub.post_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#post_post_id").append("<option value="+id+">"+nama+"</option>");
					$("#post_post_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#post_post_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function post_refresh(){			
			$("#post_post_id option").remove();
			$("#post_post_id-menu li").remove();
		}
		