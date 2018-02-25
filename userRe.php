<html>
<?php
$fd = dio_open( '/dev/ttyS1', O_RDWR );
dio_tcsetattr( $fd, array(
						'baud'         => 9600,
						'bits'         => 8,
						'stop'         => 1,
						'parity'       => 0,
						'flow_control' => 0,
						'is_canonical' => 0	));
dio_write( $fd, 'temperatur?' );
$input = '';
while( strlen( $input ) <= 10 )
	{
	$input .= dio_read( $fd, 1 );
	}
echo $input;
dio_close( $fd );
?>
</html>