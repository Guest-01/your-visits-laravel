# your-visits-laravel
간단한 웹사이트를 만들면서 여러 언어/프레임워크를 비교해보자 - php/laravel편
- Python/Flask편 [바로가기](https://github.com/Guest-01/your-visits-flask)
- NodeJS/Express편 [바로가기](https://github.com/Guest-01/your-visits-express)

### 웹사이트 요구사항 - 공통
1. 클라이언트의 IP를 기반으로 방문수를 DB에 저장한다
2. 회원가입 시, 현재 IP를 회원에게 귀속하고 방문수를 승계한다.
3. 다른 IP로 접속해도 로그인을 하면 회원정보에 추가해 방문수를 합산한다.

**(완성 스크린샷)**   
![image](https://user-images.githubusercontent.com/49602144/145356920-daeb36ea-ee2e-4c2c-8aa8-c8616ffac4ff.png)

### Laravel 후기
1. 의존성 관리
> Composer라는 툴을 이용해 의존성을 관리한다. 라라벨은 프론트엔드쪽도 포함되어있어서 자바스크립트의 npm 파일인 package.json이 프로젝트에 포함되어있다.
2. 프레임워크 특징
> 우선 boiler-plate가 굉장히 많다. 미니멀하게 최소한의 구조로 시작하는게 아니라, 기능들의 디렉터리 구조가 이미 잔뜩 만들어져있다. 또한 artisan이라는 강력한 CLI 도구가 내장되어있어서 어떤 기능을 만들때 직접 파일을 생성하지 않고 커맨드를 입력해서 생성한 후 수정하는 식이다. 프로젝트를 처음시작할 때도 `laravel new [name]` 커맨드를 사용하는데 이때 여러 미들웨어와 기본적인 User모델까지 내장시켜서 프로젝트를 구성해준다(옵션을 주면 깃과 깃허브 리파지토리까지 연동해준다). 조금만 익숙해지면 무척 편리할 것 같은데 처음 배우는 입장에서는 조금 버거울 수 있을 것 같다. 공부하기 좋았던 점은 Design Pattern의 이름을 그대로 사용하는 경우가 있어서 구조가 바로 이해가됐다. 예를 들어, `Controller`라던지, `Facades`라던지...
3. DB(ORM) 사용 방식은 어떤가? (One-to-many 관계 설정 등)
> Eloquent라는 이름의 ORM이 내장되어있다. 프로젝트 루트에 .env 파일에 환경변수로 Connection을 설정하고 artisan 커맨드로 모델을 만들거나 migration을 진행한다. 관계설정도 모델 클래스에 hasMany() 같은 메소드로 간단하게 수행할 수 있다.
4. request에 대한 정보는 어떻게 얻을 수 있는가 (클라이언트 IP, 헤더정보 등)
> `request()`라는 헬퍼 함수를 이용해도되고, 컨트롤러에 Request $request를 주입해서 이용할 수도 있다. 특히 헬퍼함수는 blade 템플릿안에서도 동작해서 편리하다.
5. 로그인, 세션관리는 어떻게 이루어지는가
> `auth()`라는 헬퍼 함수가 모든걸 알아서 해결해준다. 로그인은 `auth()->attemt()`로 하면되고, 로그인 확인은 `auth()->check()`로 하면 된다. 직접 세션을 다루고 싶다면 전역 헬퍼함수인 `session()`을 쓰면 된다.
7. 로깅은 어떻게 할 수 있는가
> 내장된 퍼사드중 하나인 Log를 이용하면 된다 `use Illuminate\Support\Facades\Log;`를 통해 불러오면 된다.
9. 배포는 편리한가
> 내장된 개발용 서버는 `php artisan serve`를 통해 구동할 수 있고, 공개배포는 웹서버를 통해 하면 된다. 예를 들어, nginx의 php-fpm을 통해 유닉스 소켓으로 연결. 워낙 전통있는 언어다보니 웹서버차원에서 연결하는 방법에 대한 예시가 무척 많다.

End.
