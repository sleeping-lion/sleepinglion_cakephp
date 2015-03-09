<?php
echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' . $this->request->data['CkeditorAsset']['CKEditorFuncNum'] . ',"' . $url . '","' . $this->request->data['CkeditorAsset']['CKEditorFuncNum']. '")</script>';
?>