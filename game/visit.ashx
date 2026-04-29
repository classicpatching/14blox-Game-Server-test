local nc = game:GetService("NetworkClient")
local player = game:GetService("Players"):CreateLocalPlayer(0)
player.Name = "Guest " .. math.random(1, 9999)

-- CRITICAL: Replace with your Laptop's Public IP
nc:Connect("YOUR_LAPTOP_IP", 53640, 0, 20)
