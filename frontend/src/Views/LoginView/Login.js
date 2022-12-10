import * as S from "../LoginView/style";
import { useNavigate } from "react-router-dom";

const Login = () => {
  const navigate = useNavigate();
  return (
    <div
      style={{
        backgroundColor: "#eeeeee",
        height: "100vh",
        display: "flex",
        justifyContent: "center",
      }}
    >
      <S.Background>
        <S.LoginInside>
          <S.Title>Login to Kitabooku</S.Title>

          <input type="email" placeholder="E-Mail"></input>
          <input type="password" placeholder="Password"></input>

          <button className="loginButton">Login</button>
          <button className="signUpButton" onClick={() => navigate("/signup")}>
            Don't have an account? <strong>Sign Up {">"}</strong>
          </button>
        </S.LoginInside>
      </S.Background>
    </div>
  );
};

export default Login;