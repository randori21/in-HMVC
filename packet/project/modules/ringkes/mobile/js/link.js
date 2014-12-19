
		var servicelinkURL = "http://localhost/adminProject/index.php/service/link/";
		var x=0;

		$("#link").bind("pageinit", function(event) {
			link_read();
		});

		function link_read() {
			$.getJSON(servicelinkURL + "link_read", function(data) {
				$("#listlink li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listlink").append(
						"<li ><a href='#details_link' id='krm' data-krm="+ isi.link_id +" onclick='link_edit("+isi.link_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.link_address + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='link_del("+ isi.link_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.link_id +">" +
						"</li>");
				});
				$("#listlink").listview("refresh");
			});
		}
		function link_add(){	
			try {	
					console.log("buat baru");
				
						$("#link_id").val("");
						$("#link_address").val("");
						$("#link_nama").val("");
						$("#link_keterangan").val("");
						$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");
						jnsusr_refresh();
						jnsusr_sub("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function link_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicelinkdetailsURL+"link_id_search", {
				"link_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#link_id").val(field.link_id);
						$("#link_address").val(field.link_address);
						$("#link_nama").val(field.link_nama);
						$("#link_keterangan").val(field.link_keterangan);
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

		function link_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicelinkURL + "link_del", {
						"link_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							link_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#link";					
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
		function link_sub(a){
			try {
				isi="pilihan link";
				$.post(servicelinkURL + "link_read", {
					"link_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.link_id;
					nama = fieldsub.link_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#link_link_id").append("<option value="+id+">"+nama+"</option>");
					$("#link_link_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#link_link_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function link_refresh(){			
			$("#link_link_id option").remove();
			$("#link_link_id-menu li").remove();
		}
		