<?php
//
// ��������! �� ����������� ���������� � ������� �� ������ ���� ��������
// �� ������ �������. � ��������� ������ ������� header(), ������������
// �����������, �� ��������� (��. ������������), � ��������� ������.
//

// �������� ������.
session_start();
// ���������� ���������� ���������.
require_once "../../lib/config.php";
require_once "JsHttpRequest/JsHttpRequest.php";
// ������� ������� ������ ����������.
// ��������� ��������� �������� (�����������!).
$JsHttpRequest =& new JsHttpRequest("windows-1251");
// �������� ������.
$q = @$_REQUEST['q'];
// ��������� ��������� ����� � ���� PHP-�������!
$_RESULT = array(
  "q"     => $q,
  "md5"   => md5($q),
  'hello' => isset($_SESSION['hello'])? $_SESSION['hello'] : null,
  'upload'=> print_r($_FILES, 1),
); 
// ������������ ���������� ���������.
if (strpos($q, 'error') !== false) {
  callUndefinedFunction();
}
if (@$_REQUEST['dt']) {
  sleep($_REQUEST['dt']);
}
?>
<pre>
<b>QUERY_STRING:</b> <?=$_SERVER['QUERY_STRING'] . "\n"?>
<b>Request method:</b> <?=$_SERVER['REQUEST_METHOD'] . "\n"?>
<b>Content-Type:</b> <?=@$_SERVER['CONTENT_TYPE'] . "\n"?>
<b>Loader used:</b> <?=$JsHttpRequest->LOADER . "\n"?>
<b>Uploaded file size:</b> <?=@$_FILES['file']['size'] . "\n"?>
<b>_GET:</b> <?=print_r($_GET, 1)?>
<b>_POST:</b> <?=print_r($_POST, 1)?>
<b>_FILES:</b> <?=print_r($_FILES, 1)?>
</pre>
