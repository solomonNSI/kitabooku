import React from "react";
import * as S from "./style";
import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";

function App() {
  const navigate = useNavigate();
  return (
    <div style={{ backgroundColor: "#eeeeee", height: "100vh" }}>
      <S.Content>
        <S.Title>Welcome to Kitabooku</S.Title>

        <S.ButtonContainer>
          <S.Button onClick={() => navigate("/signup")}>Sign Up {">"}</S.Button>
          <div style={{ width: "20px" }}/>
          <S.Button onClick={() => navigate("/login")}>Login {">"}</S.Button>
        </S.ButtonContainer>

      </S.Content>

    </div>
  );
}

export default App;