<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Teachers attendence</h2>

<table>
  <tr>
    <th>Teacher name</th>
    <th>Subject</th>
    <th>Class</th>
    <th>Enter time</th>
    <th>Exit time</th>
  </tr>
  <tbody>
  <tr>
    <td><?php echo $tchr_class['id'] ?></td>
    <td><?php foreach ($teacher as $key => $value) { ?>
                                        <?php if($value['id'] == $tchr_class['teacher_id']){?>
                                        <?php echo ucwords($value['name'])?> 
                                        <?php }else{ ?>
                                        <?php }?>
                                        <?php }?></td>
    <td><?php foreach ($subject as $key => $value) { ?>
                                        <?php if($value['id'] == $tchr_class['subject_id']){?>
                                        <?php echo ucwords($value['name'])?> 
                                        <?php }else{ ?>
                                        <?php }?>
                                        <?php }?></td>
    <td><?php foreach ($enter_time as $key => $value) { ?>
                                        <?php if($value['id'] == $tchr_class['time_slot_id']){?>
                                        <?php echo ucwords($value['start_time'])?> 
                                        <?php }else{ ?>
                                        <?php }?>
                                        <?php }?></td>
    <td><?php foreach ($end_time as $key => $value) { ?>
                                        <?php if($value['id'] == $tchr_class['time_slot_id']){?>
                                        <?php echo ucwords($value['end_time'])?> 
                                        <?php }else{ ?>
                                        <?php }?>
                                        <?php }?></td>
  </tr>



</tbody>
</table>

</body>
</html>

