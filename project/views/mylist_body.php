<?php  
  if (isset($_REQUEST['ok'])) 
  {              
    $key = addslashes($_POST['key']);

    if (empty($key)) 
    {
      echo "<p style= 'color:red;'>* Dữ liệu tìm kiếm không được để trống</p>";
    } 
    else
    {
      $music->m_search($key);
    }
  }
  else
  {
    $sql = "SELECT ms.id, song, singer, img, mp3 FROM music ms
            INNER JOIN mylist ml
            ON ms.id = ml.id
            INNER JOIN users us
            ON ml.userid = us.userid
            WHERE us.username = '$_SESSION[name]' ";

    $music->query($sql);
 
    $dem=1;  
    while ($data = $music->fetch_assoc()) 
    {
      require("./public/library/music_play.php");
    }
  }
  $music->disconnect();
?>  
        </ul>
        <div class="force-overflow"></div>
      </div>
    </div>
    <div class="col-sm-3">
      
    </div>
  </div>
  </div>
  <div style="height: 20px; width: 100%"></div>s    
</div>