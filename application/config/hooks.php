<?php

//
// COPY THE FOLLOWING CODE (lines 7-16) INTO YOUR config/hook.php FILE
//

/* ----------------------------------------------------------------- */
/*
|
| Added as part of the usertracking library by Casey McLaughlin.  Please ensure
| that you have the Usertracking.php file installed in your application/library folder!
*/
$hook['post_system'][] = array('class' => 'Usertracking', 
                                               'function' => 'auto_track',
                                               'filename' => 'Usertracking.php',
                                               'filepath' => 'libraries');

/* End of file hooks.php */
/* Location: /system/application/config/hooks.php */