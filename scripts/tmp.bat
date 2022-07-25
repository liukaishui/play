@echo off

set num=10094
set name=ÄãµÄÃû×Ö
set url=
download -i %url% -o ../m3u8/%num% -t 100
start cmd /c ffmpeg -i  http://127.0.0.1/m3u8/%num%/index.m3u8 -c copy ../mp4/%num%.mp4
echo %num% %name%>>tmp.txt

cmd /k
