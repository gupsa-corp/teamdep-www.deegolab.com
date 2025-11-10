# Rhymix Development Setup

이 설정은 Rhymix CMS를 Docker를 사용해서 개발 환경으로 구성합니다. 파일 수정이 바로 반영되고, NGINX 프록시와 SSL까지 모두 포함되어 있습니다.

## 🚀 빠른 시작

### **⚠️ 필수 사전 작업**
환경변수 설정이 **필수**입니다:
```bash
# .env 파일 생성 (필수!)
cp .env.example .env

# 환경변수 확인
./check-env.sh
```

### **시작 명령어**
```bash
# 프로젝트 시작 (환경변수 자동 검증 포함)
./start-rhymix.sh

# 또는 수동으로
./check-env.sh && docker compose up -d
```

> **🚨 주의**: .env 파일이 없으면 Docker Compose 실행이 실패합니다!

## 📁 디렉토리 구조

```
├── .env.example           # 환경변수 템플릿 (커밋됨)
├── .env                   # 환경변수 설정 (git에서 제외)
├── .gitignore             # Git 제외 파일 목록
├── docker-compose.yml     # Docker Compose 설정 (.env 의존)
├── check-env.sh           # 환경변수 검증 스크립트
├── start-rhymix.sh        # 시작 스크립트 (검증 포함)
├── setup-ssl.sh           # SSL 설정 스크립트
└── rhymix/
    ├── www/               # Rhymix 소스 코드 (수정 가능)
    ├── nginx/
    │   └── conf.d/        # NGINX 설정 파일들
    ├── ssl/               # SSL 인증서
    └── logs/              # NGINX 로그
```

## 🌐 접속 주소

- **HTTP**: http://localhost:4001
- **HTTPS**: https://localhost (자체 서명 인증서)

## 🔧 개발 환경

### 파일 수정
- `./rhymix/www/` 폴더의 파일을 수정하면 바로 반영됩니다
- PHP, CSS, JS 파일 등 모든 변경사항이 실시간 적용됩니다

### NGINX 설정 수정
- `./rhymix/nginx/conf.d/` 폴더의 설정 파일을 수정 후 재시작:
```bash
docker-compose restart nginx-proxy
```

## 🔒 SSL 설정

### 개발용 (현재 설정)
- 자체 서명 인증서 자동 생성
- 브라우저에서 보안 경고가 나타날 수 있음

### 프로덕션용
1. **Let's Encrypt 사용** (권장):
   ```yml
   environment:
     - VIRTUAL_HOST=your-domain.com
     - LETSENCRYPT_HOST=your-domain.com
     - LETSENCRYPT_EMAIL=your-email@domain.com
   ```

2. **상용 인증서 사용**:
   - `./rhymix/ssl/` 폴더에 인증서 파일 배치
   - `your-domain.crt`, `your-domain.key`

## 🗄️ 데이터베이스 정보

### **환경설정**
환경변수는 `.env` 파일에서 관리됩니다. 처음 설정 시 `.env.example`을 복사하세요:
```bash
cp .env.example .env
```

### **기본 데이터베이스 접속 정보**

#### **Rhymix 설치 시 입력값**:
- **데이터베이스 유형**: MariaDB/MySQL
- **호스트**: `rhymix_db` (또는 환경변수 `DB_HOST`)
- **포트**: `3306`
- **데이터베이스명**: `rhymix`
- **사용자명**: `rhymix`
- **비밀번호**: `rhymix123`

#### **관리자 계정**:
- **사용자명**: `root`
- **비밀번호**: `rootpass123`

### **데이터베이스 접속 방법**

#### 터미널에서 직접 접속:
```bash
# 일반 사용자 계정
docker exec -it rhymix_db mysql -u rhymix -p
# 비밀번호: rhymix123

# 관리자 계정
docker exec -it rhymix_db mysql -u root -p
# 비밀번호: rootpass123
```

#### 외부 도구 (phpMyAdmin, MySQL Workbench):
- **호스트**: `localhost`
- **포트**: `3306`
- **사용자명/비밀번호**: 위와 동일

## 📋 주요 명령어

```bash
# 서비스 시작
docker-compose up -d

# 서비스 중지
docker-compose down

# 로그 확인
docker-compose logs -f

# 특정 서비스 로그
docker-compose logs -f rhymix
docker-compose logs -f db

# 서비스 재시작
docker-compose restart

# 권한 수정 (필요시)
sudo chown -R www-data:www-data ./rhymix/www
sudo chmod -R 755 ./rhymix/www
sudo chmod -R 777 ./rhymix/www/files

# 데이터베이스 백업
docker exec rhymix_db mysqldump -u root -p rhymix > backup.sql

# 데이터베이스 복원
docker exec -i rhymix_db mysql -u root -p rhymix < backup.sql
```

## 🔍 트러블슈팅

### 권한 문제
```bash
sudo chown -R www-data:www-data ./rhymix/www
sudo chmod -R 755 ./rhymix/www
sudo chmod -R 777 ./rhymix/www/files
```

### 포트 충돌
- `docker-compose.yml`에서 포트 변경
- 다른 서비스가 80, 443, 4001 포트를 사용하고 있는지 확인

### SSL 인증서 재생성
```bash
rm -f ./rhymix/ssl/localhost.*
./setup-ssl.sh
```

## 🏗️ 서비스 구성

- **rhymix**: Rhymix CMS 메인 컨테이너 (포트: 4001, 4443)
- **db**: MariaDB 10.11 데이터베이스 서버 (포트: 3306)
- **볼륨**: `db_data` - 데이터베이스 영구 저장소
- **네트워크**: `rhymix-network` - 컨테이너 간 통신

## 📦 포함된 기능

- ✅ 파일 실시간 동기화
- ✅ NGINX 리버스 프록시
- ✅ SSL/TLS 지원 (개발/프로덕션)
- ✅ Let's Encrypt 자동 갱신
- ✅ Gzip 압축
- ✅ 보안 헤더
- ✅ 정적 파일 캐싱
- ✅ 로그 파일 접근

## 🚨 보안 주의사항

1. **프로덕션 환경**에서는 반드시 실제 SSL 인증서 사용
2. **데이터베이스** 설정 시 안전한 비밀번호 사용
3. **파일 권한** 정기 점검
4. **정기 백업** 설정