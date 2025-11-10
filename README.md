# Rhymix Docker Setup

이 폴더는 Rhymix CMS를 Docker로 실행하기 위한 설정 파일들을 포함합니다.

## 구성 파일

- `docker-compose.yml`: Docker Compose 설정 파일
- `.env`: 환경 변수 설정 파일

## 사용 방법

### 1. 현재 실행 중인 컨테이너 정리
```bash
docker stop rhymix
docker rm rhymix
```

### 2. Docker Compose로 실행
```bash
docker-compose up -d
```

### 3. 웹 브라우저에서 접속
```
http://localhost:3000
```

## 서비스 구성

- **Rhymix**: 포트 3000에서 실행되는 메인 웹 애플리케이션
- **MariaDB**: Rhymix 데이터베이스

## 데이터베이스 정보

- Host: db
- Database: rhymix
- Username: rhymix
- Password: rhymix123

## 관리 명령어

```bash
# 서비스 시작
docker-compose up -d

# 서비스 중지
docker-compose down

# 로그 확인
docker-compose logs -f rhymix

# 데이터베이스 접속
docker-compose exec db mysql -u rhymix -p rhymix
```