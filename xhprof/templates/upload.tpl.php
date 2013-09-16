<?php
if (isset($_FILES['userfile'])){
    $xhprof_data = unserialize(file_get_contents($_FILES['userfile']['tmp_name']));
    //echo $xhprof_data;
    echo '<br/>'.(!empty($xhprof_data) ? 'Loaded data' : '').'<br/>';

    if (!empty($xhprof_data)){
        $xhprof_data_obj        = new \ay\xhprof\Data($config['pdo']);
        $rowNumber = $xhprof_data_obj->save($xhprof_data);
    }
}
?>

<div style='width: 500px; padding-top: 30px; margin: 0 auto;'>
    <form action="" method="post" enctype="multipart/form-data">
        <input type='file' name='userfile'/>
        <br/>
        <button type='submit'>Upload</button>
        <br/>
        <?php if (isset($rowNumber)):?>Inserted as Row #<?php endif;?>
    </form>
</div>