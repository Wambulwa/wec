<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
<?php if(isset($file_name)):?><a href="<?php echo base_url('uploads/'.$file_name['file_name']).'?python?=wecNow?'.$file_name['file_size'];?>" target="_blank">View file</a> <?php  endif; foreach($msg as $msg):?><br><a href="<?php echo base_url('uploads/'.$msg->doc_name).'?python?=#@Author=@Ayub?'.$file_name['file_size'];?>" target="_blank"><?php echo "View your file";?></a><?php endforeach;?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>