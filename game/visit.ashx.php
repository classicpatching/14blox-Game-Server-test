<?php
header("Content-Type: text/plain");
?>
-- FAST JOIN SCRIPT
local nc = game:GetService("NetworkClient")
local player = game:GetService("Players"):CreateLocalPlayer(0)
player.Name = "Guest_" .. math.random(1, 9999)

-- REPLACE WITH YOUR LAPTOP'S PUBLIC IP
nc:Connect("YOUR_PUBLIC_IP", 53640, 0, 20)

game:GetService("RunService"):Run()
