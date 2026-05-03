import random

# Генерируем рандомные цифры, как в 2014 году
guest_id = random.randint(1000, 9999)
guest_name = f"Guest {guest_id}"

# Формируем XML для ответа
xml_response = f"""<?xml version="1.0" encoding="UTF-8"?>
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <v>1</v>
  <p>
    <string name="MachineAddress">185.27.71.228</string> 
    <int name="ServerPort">53640</int>
    <string name="Ticket">1</string>
    <string name="UserName">{guest_name}</string>
    <int name="UserId">-{guest_id}</int>
    <string name="MembershipType">None</string>
    <string name="CharacterAppearance">http://твойдомен.com/asset/?id=1</string>
  </p>
</roblox>"""
