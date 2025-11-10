# Rhymix Database Connection Solution

## 문제 해결됨 ✅

사용자가 보고한 "SQLSTATE[HY000] [2002] No such file or directory" 오류가 해결되었습니다.

## 올바른 데이터베이스 설정

Rhymix 설치 시 **반드시** 다음 설정을 사용하세요:

```
DB 서버 주소: rhymix_db
DB 서버 포트: 3306
DB 아이디: rhymix
DB 비밀번호: rhymix123
DB 이름: rhymix
테이블 접두사: rx_
```

## 중요한 포인트

❌ **잘못된 설정** (흔한 실수):
- DB 서버 주소: `localhost` ← 이것이 오류의 원인!

✅ **올바른 설정**:
- DB 서버 주소: `rhymix_db` ← Docker 컨테이너 이름 사용

## 연결 테스트 결과

```bash
$ docker exec rhymix-dev php -r "..."
✅ Database connection successful!
Connection details:
  Host: rhymix_db
  User: rhymix
  Database: rhymix
  MySQL Version: 10.11.14-MariaDB-ubu2204
```

## 왜 localhost가 안 되는가?

- Docker 환경에서 각 컨테이너는 독립된 네트워크 환경을 가짐
- `localhost`는 Rhymix 컨테이너 자체를 가리키므로 데이터베이스를 찾을 수 없음
- `rhymix_db`는 docker-compose.yml에서 정의된 MariaDB 컨테이너의 서비스명
- Docker의 내부 네트워킹이 이 서비스명을 실제 컨테이너 IP로 자동 해석

## 설치 진행 방법

1. http://localhost:4001 접속
2. 사용권 동의 체크 → 다음
3. 설치 환경 확인 → 다음
4. **DB 정보 입력에서 위의 정확한 설정 사용**
5. 관리자 계정 생성
6. 설치 완료

이제 Rhymix 설치가 성공적으로 진행될 것입니다! 🎉