<div id="ordersBtn" >
  <h2>Students Assessement</h2>
  <table class="table table-striped">
    <thead>
      <tr>
          <th>S.N.</th>
          <th>Student Name</th>
          <th>Quiz Score</th>
          <th>Project Score</th>
          <th>Attendence</th>
          <th>Retention</th>
          <th>Creativity</th>
          <th>Concentration</th>
          <th>Applicability</th>
          <th>Interest</th>
          <th>Speed</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from orders, product";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$count?></td>
          <td><?=$row["student_name"]?></td>
          <td><?=$row["quiz_score"]?></td>
          <td><?=$row["project_score"]?></td>
          <td><?=$row["attendence"]?></td>
          <td><?=$row["retention"]?></td>
          <td><?=$row["creativity"]?></td>
          <td><?=$row["concentration"]?></td>
          <td><?=$row["applicability"]?></td>
          <td><?=$row["Interest"]?></td>
          <td><?=$row["Speed"]?></td>
    <?php
         $count=$count+1;   
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>