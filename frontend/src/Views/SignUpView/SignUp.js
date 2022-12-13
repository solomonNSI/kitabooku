import * as S from "../SignUpView/style";
import { useNavigate } from "react-router-dom";

const SignUp = () => {
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
        <S.SignUpInside>
          <S.Title>Sign Up to Kitabooku</S.Title>
          <input type="text" placeholder="Name"></input>
          <input type="email" placeholder="E-Mail"></input>
          <input type="password" placeholder="Password"></input>
          <input type="password" placeholder="Confirm Password"></input>
          
          <S.Container>
          <S.Label id="reader">
            <S.Input type="radio" name="location" id="reader" value="reader" />
            <S.RadioBox></S.RadioBox>
            <S.Paragraph>Reader</S.Paragraph>
          </S.Label>

          <S.Label id="author">
            <S.Input type="radio" name="location" id="author" value="author" />
            <S.RadioBox></S.RadioBox>
            <S.Paragraph>Author</S.Paragraph>
          </S.Label>
          </S.Container>
          
      

          <button className="signUpButton">Sign Up</button>
          <button className="loginButton" onClick={() => navigate("/login")}>
            Already have an account? <strong>Login {">"}</strong>
          </button>
        </S.SignUpInside>
      </S.Background>
    </div>
  );
};

export default SignUp;