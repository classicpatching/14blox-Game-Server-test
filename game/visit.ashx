<?php
header('Content-Type: text/xml');

// 1. Настройки подключения
$localIp = "185.27.71.228"; // ВПИШИ СЮДА СВОЙ IPv4 (из ipconfig)
$port = 53640;

// 2. Генерируем Гостя (Guest) как в старые добрые
$guestId = rand(1000, 9999);
$userName = "Guest " . $guestId;
$userId = -$guestId; // У гостей всегда отрицательный ID

// 3. Формируем XML ответ
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <v>1</v>
  <p>
    <string name="MachineAddress"><?php echo $localIp; ?></string>
    <int name="ServerPort"><?php echo $port; ?></int>
    <string name="Ticket">1</string>
    <string name="UserName"><?php echo $userName; ?></string>
    <int name="UserId"><?php echo $userId; ?></int>
    <string name="MembershipType">None</string>
    <string name="CharacterAppearance">http://<?php echo $_SERVER['HTTP_HOST']; ?>/asset/?id=1</string>
  </p>
</roblox>
