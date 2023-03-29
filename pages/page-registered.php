<?php
/* Template name: Registered */
get_header(); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.1/datatables.min.css"/>

<?php
    if ( is_user_logged_in() ) {

        $current_user = wp_get_current_user();
        $user_info    = get_userdata( $current_user->ID );
        //echo 'current role :' . implode( ', ', $user_info->roles );

        $assetwise_db = new wpdb( 'assetwisec_regis',
            'Dg4xkbpIWyTp7U',
            'assetwisec_regis',
            'localhost' );
        $user         = $assetwise_db->get_results( "SELECT * FROM register_atmozladprao71 ORDER BY `register_atmozladprao71`.`created_at` DESC" );
?>

<div id="register-list">
    <div class="container">
        <table id="listTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ชื่อ-สกุล</th>
                <th>อีเมล์</th>
                <th>เบอร์โทร</th>
                <th>เวลาที่ลงทะเบียน</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user as $value) { ?>
                <tr>
                    <td><?php echo $value->name; ?> <?php echo $value->surname; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo $value->tel; ?></td>
                    <td><?php echo $value->created_at; ?></td>
                </tr>
            <?php } ?>
            <tbody>
        </table>
    </div>
</div>

<?php } else { ?>
    <!-- do something if user not login -->
<?php } ?>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

<script>
    jQuery(document).ready(function( $ ) {
        $('#listTable').DataTable();
    });
</script>

<?php
get_footer();
