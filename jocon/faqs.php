    <div class="row-fluid">
        <div class="span3">
            <?php include "joinc/sidebar_left.php";?>
        </div>
        <div class="span9">
            <?php include "joinc/breadcrumb.php";?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="page-header">
                        <h1>FAQ's <small>King Pheromone</small></h1>
                    </div>
                
                    <?php 
						$about = mysql_fetch_array(mysql_query("SELECT static_content FROM modul WHERE id_modul = 4"));
						echo $about[static_content];
					?>
                    
                </div>
            </div>
        </div>
      </div>