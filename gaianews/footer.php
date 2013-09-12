
  <!-- fine page body -->
  </div>
  
  <div class="footer">
    <div class="menu_nav">
        <?php wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => false, 
        )); ?> 
    </div>
    
    <div class="logo"></div>
    
    <div class="info">  
      Gaianews.it è una rivista registrata presso il Tribunale di Bologna, aut. n. 8144<br /> 
      Email: redazione@gaianews.it  - Tel: 051-776869 - Fax: 051-0544606<br /> 
      Via Poggio Maggiore, 2/2 - 40065 - Pianoro (BO) - Copyright 2013 © Gaianews.it - Tutti i diritti sono riservati<br />       
    </div>    
    
  </div>

<!-- fine page wrapper -->
</div>

<!-- per far funzionare admin bar -->
<?php wp_footer(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12949454-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>