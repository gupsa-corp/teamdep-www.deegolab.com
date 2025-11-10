#!/bin/bash

echo "🚀 Rhymix 자동 설치 시작"

# 쿠키 파일 초기화
rm -f cookies.txt
BASE_URL="http://localhost:4001"

echo "1️⃣ 초기 페이지 접속 및 사용권 동의..."

# 1. 초기 페이지 접속
curl -s -c cookies.txt "${BASE_URL}/" > step1.html

# CSRF 토큰 추출
CSRF_TOKEN=$(grep -o 'csrf-token" content="[^"]*' step1.html | cut -d'"' -f3)
echo "   CSRF Token: $CSRF_TOKEN"

# 2. 사용권 동의
curl -s -c cookies.txt -b cookies.txt \
  -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "act=procInstallLicenseAgreement" \
  -d "module=install" \
  -d "license_agreement=Y" \
  "${BASE_URL}/" > step2.html

echo "2️⃣ 환경 확인 단계 통과..."

# 3. 환경 확인 페이지로 이동
curl -s -c cookies.txt -b cookies.txt "${BASE_URL}/?act=dispInstallCheckEnv" > step3.html

# 환경 확인 통과
curl -s -c cookies.txt -b cookies.txt \
  -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "act=procInstallCheckEnv" \
  -d "module=install" \
  "${BASE_URL}/" > step4.html

echo "3️⃣ 데이터베이스 설정 (rhymix_db 사용)..."

# 4. DB 설정
curl -s -c cookies.txt -b cookies.txt \
  -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "module=" \
  -d "act=procDBConfig" \
  -d "db_type=mysql" \
  -d "db_host=rhymix_db" \
  -d "db_port=3306" \
  -d "db_user=rhymix" \
  -d "db_pass=rhymix123" \
  -d "db_database=rhymix" \
  -d "db_prefix=rx_" \
  "${BASE_URL}/" > step5.html

echo "4️⃣ 관리자 계정 생성..."

# 5. 관리자 계정 설정
curl -s -c cookies.txt -b cookies.txt \
  -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "module=" \
  -d "act=procInstallManagerConfig" \
  -d "user_id=admin" \
  -d "user_name=Administrator" \
  -d "email_address=admin@localhost.com" \
  -d "password=admin123!" \
  -d "password2=admin123!" \
  -d "nick_name=Admin" \
  "${BASE_URL}/" > step6.html

echo "5️⃣ 설치 완료 확인..."

# 6. 설치 완료 확인
curl -s -c cookies.txt -b cookies.txt "${BASE_URL}/" > final.html

if grep -q "설치가 완료" final.html || grep -q "installation.*complete" final.html; then
    echo "✅ Rhymix 설치 성공!"
else
    echo "📝 현재 상태 확인:"
    grep -E "(사용권|환경|DB|관리자|complete|설치)" final.html | head -3
fi

echo ""
echo "🎉 설치 정보:"
echo "URL: http://localhost:4001"
echo "관리자 ID: admin"
echo "관리자 비밀번호: admin123!"
echo "DB 호스트: rhymix_db"
echo ""