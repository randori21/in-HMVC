
		

			<!-- main #E6FF99-->
			<div id="main">

				<div class="post">
					<h2><?php echo $topik;?></h2>

					<p class="post-info">Diposting oleh : <a href="index.html"><?php if(isset($penulis)){echo $penulis;}?></a> | <span class="date"><?php echo $tanggal;?></span></p>

					<?php echo $gambar;?>
                                        <?php echo $isi;?>
                                       <!-- <div class="fb-send" data-href="http://stmikka.ac.id/" data-font="arial" style="margin-left: 20px;"></div>
                                        <a name="fb_share" type="icon_link" 
   share_url="http://stmikka.ac.id/">Bagikan</a> 
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" 
        type="text/javascript">
</script>-->
					<?php echo $tag;?>					
                                        <?php echo $sub_menu;?>
                                        <?php 
                                            $this->load->helper('url');                                            
                                            if($this->uri->segment(2)=='artikel'){
                                        ?>
                                            <!--
                                        <div style="width:580px;margin:0 10px 0 10px;">
                                        <div id="disqus_thread"></div>
                                        <script type="text/javascript">
                                            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                            var disqus_shortname = 'stmikkadiri'; // required: replace example with your forum shortname

                                            /* * * DON'T EDIT BELOW THIS LINE * * */
                                            (function() {
                                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                            })();
                                        </script>
                                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>                                        
                                        
                                        <script type="text/javascript">
                                            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                            var disqus_shortname = 'stmikkadiri'; // required: replace example with your forum shortname

                                            /* * * DON'T EDIT BELOW THIS LINE * * */
                                            (function () {
                                                var s = document.createElement('script'); s.async = true;
                                                s.type = 'text/javascript';
                                                s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
                                                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                                            }());
                                        </script>	
                                        </div>	-->
                                        <? }//=$jumlah_komentar;?>
                                        <?//=$tampil_komentar;?>


					<!-- respond -->
                                        <?//=$validasi;?>
					<?//=$komentar;?>
                                    <!-- /post -->
				</div>

			<!-- /main -->
			</div>

			

		<!-- /content -->
		