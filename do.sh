#!/bin/bash

set -e

# ==============================================
# COLOR DEFINITIONS
# ==============================================
readonly RED='\033[0;31m'
readonly GREEN='\033[0;32m'
readonly YELLOW='\033[0;33m'
readonly CYAN='\033[0;36m'
readonly MAGENTA='\033[0;35m'
readonly BLUE='\033[1;34m'
readonly WHITE='\033[1;37m'
readonly NC='\033[0m'

# ==============================================
# CONFIGURATION
# ==============================================
readonly DEFAULT_PASSWORD="@MawMaw666"
readonly SCRIPT_VERSION="1.0"

# ==============================================
# FUNCTION: Display Header
# ==============================================
display_header() {
    clear
    echo -e "${CYAN}"
    echo " ╔════════════════════════════════════════════════════════════════════════╗"
    echo " ║              WINDOWS AUTO INSTALLER v${SCRIPT_VERSION}                             ║"
    echo " ║                      Professional Edition                              ║"
    echo " ╚════════════════════════════════════════════════════════════════════════╝"
    echo -e "${NC}"
    echo -e "${YELLOW}                     © Warkop Digital System ${NC}"
    echo ""
}

# ==============================================
# FUNCTION: Display Server Information
# ==============================================
display_server_info() {
    echo -e "${BLUE}╔══════════════════════════════════════════════════════════════════════╗${NC}"
    echo -e "${BLUE}║${WHITE}                       SERVER INFORMATION                             ${BLUE}║${NC}"
    echo -e "${BLUE}╠══════════════════════════════════════════════════════════════════════╣${NC}"
    echo -e "${BLUE}║${NC} ${CYAN}Version        : ${SCRIPT_VERSION} Professional Edition${NC}"
    echo -e "${BLUE}║${NC} ${CYAN}Provider       : DigitalOcean${NC}"
    echo -e "${BLUE}║${NC} ${CYAN}Client Type    : Windows RDP${NC}"
    echo -e "${BLUE}╚══════════════════════════════════════════════════════════════════════╝${NC}"
    echo ""
}

# ==============================================
# FUNCTION: Select Windows Version
# ==============================================
select_windows_version() {
    echo -e "${MAGENTA}╔════════════════════════════════════════════════╗${NC}"
    echo -e "${MAGENTA}║${WHITE}        Select Windows Version                  ${MAGENTA}║${NC}"
    echo -e "${MAGENTA}╠════════════════════════════════════════════════╣${NC}"
    echo -e "${MAGENTA}║${CYAN} 1) Windows Server 2012                         ${MAGENTA}║${NC}"
    echo -e "${MAGENTA}║${CYAN} 2) Windows Server 2016                         ${MAGENTA}║${NC}"
    echo -e "${MAGENTA}║${CYAN} 3) Windows Server 2019                         ${MAGENTA}║${NC}"
    echo -e "${MAGENTA}║${CYAN} 4) Windows Server 2022                         ${MAGENTA}║${NC}"
    echo -e "${MAGENTA}║${CYAN} 5) Windows 10                                  ${MAGENTA}║${NC}"
    echo -e "${MAGENTA}║${CYAN} 6) Windows 11                                  ${MAGENTA}║${NC}"
    echo -e "${MAGENTA}╚════════════════════════════════════════════════╝${NC}"
    echo ""

    read -p "Select option (1-6): " choice

    case $choice in
        1) echo "https://sourceforge.net/projects/nixpoin/files/windows2012.gz" ;;
        2) echo "https://sourceforge.net/projects/nixpoin/files/windows2016.gz" ;;
        3) echo "https://sourceforge.net/projects/nixpoin/files/windows2019.gz" ;;
        4) echo "https://sourceforge.net/projects/nixpoin/files/windows2022.gz" ;;
        5) echo "https://sourceforge.net/projects/nixpoin/files/windows10.gz" ;;
        6) echo "https://sourceforge.net/projects/nixpoin/files/windows11.gz" ;;
        *)
            echo -e "${RED}✖ Invalid selection!${NC}"
            exit 1
            ;;
    esac
}

# ==============================================
# FUNCTION: Configure Password
# ==============================================
configure_password() {
    echo -e "${CYAN}╔════════════════════════════════════════════════╗${NC}"
    echo -e "${CYAN}║   Configure Administrator Password            ║${NC}"
    echo -e "${CYAN}╚════════════════════════════════════════════════╝${NC}"
    echo ""
    echo -e "${CYAN}1) Set custom password${NC}"
    echo -e "${CYAN}2) Use default password${NC}"
    echo ""

    read -p "Select option (1-2): " password_choice

    if [ "$password_choice" -eq 1 ]; then
        read -sp "Enter password: " password
        echo ""
        read -sp "Confirm password: " password_confirm
        echo ""

        if [ "$password" != "$password_confirm" ]; then
            echo -e "${RED}✖ Passwords do not match!${NC}"
            exit 1
        fi

        echo -e "${GREEN}✓ Custom password set${NC}"
    else
        password="$DEFAULT_PASSWORD"
        echo -e "${YELLOW}ℹ Using default password: $password${NC}"
    fi

    echo "$password"
}

# ==============================================
# FUNCTION: Create Network Configuration Script
# ==============================================
create_network_script() {
    local password=$1
    local ip4=$(curl -4 -s icanhazip.com)
    local gateway=$(ip route | awk '/default/ { print $3 }')

    cat >/tmp/net.bat<<EOF
@ECHO OFF
cd.>%windir%\GetAdmin
if exist %windir%\GetAdmin (del /f /q "%windir%\GetAdmin") else (
echo CreateObject^("Shell.Application"^).ShellExecute "%~s0", "%*", "", "runas", 1 >> "%temp%\Admin.vbs"
"%temp%\Admin.vbs"
del /f /q "%temp%\Admin.vbs"
exit /b 2)

REM Set Administrator password
net user Administrator $password

REM Configure network settings
netsh -c interface ip set address name="Ethernet" source=static address=$ip4 mask=255.255.240.0 gateway=$gateway
netsh -c interface ip add dnsservers name="Ethernet" address=1.1.1.1 index=1 validate=no
netsh -c interface ip add dnsservers name="Ethernet" address=8.8.4.4 index=2 validate=no

REM Clean up startup script
cd /d "%ProgramData%/Microsoft/Windows/Start Menu/Programs/Startup"
del /f /q net.bat
exit
EOF

    echo -e "${GREEN}✓ Network configuration script created${NC}"
}

# ==============================================
# FUNCTION: Install Windows
# ==============================================
install_windows() {
    local os_url=$1

    echo ""
    echo -e "${YELLOW}════════════════════════════════════════════════${NC}"
    echo -e "${YELLOW}  Starting Windows Installation Process${NC}"
    echo -e "${YELLOW}════════════════════════════════════════════════${NC}"
    echo ""

    echo -e "${CYAN}→ Downloading Windows image...${NC}"
    if ! wget --no-check-certificate -O- "$os_url" | gunzip | dd of=/dev/vda bs=3M status=progress; then
        echo -e "${RED}✖ Download failed!${NC}"
        exit 1
    fi

    echo ""
    echo -e "${GREEN}✓ Download completed${NC}"
    echo -e "${CYAN}→ Configuring system...${NC}"

    mount.ntfs-3g /dev/vda2 /mnt
    cd "/mnt/ProgramData/Microsoft/Windows/Start Menu/Programs/"
    cd Start* 2>/dev/null || cd start* 2>/dev/null

    wget -q https://nixpoin.com/ChromeSetup.exe
    cp -f /tmp/net.bat net.bat

    echo -e "${GREEN}✓ Configuration completed${NC}"
}

# ==============================================
# FUNCTION: Finalize Installation
# ==============================================
finalize_installation() {
    echo ""
    echo -e "${GREEN}════════════════════════════════════════════════${NC}"
    echo -e "${GREEN}  Installation Completed Successfully!${NC}"
    echo -e "${GREEN}════════════════════════════════════════════════${NC}"
    echo ""
    echo -e "${YELLOW}ℹ Server will restart in 5 seconds...${NC}"

    for i in {5..1}; do
        echo -e "${CYAN}  $i...${NC}"
        sleep 1
    done

    echo ""
    echo -e "${BLUE}→ Shutting down...${NC}"
    poweroff
}

# ==============================================
# MAIN EXECUTION
# ==============================================
main() {
    display_header
    display_server_info

    os_url=$(select_windows_version)
    password=$(configure_password)

    create_network_script "$password"
    install_windows "$os_url"
    finalize_installation
}

# Run main function
main
