import React from "react";
import styled from "styled-components";

export const Content = styled.div`
  display: flex;
  flex-direction: column;
  width: calc(100%-130px);
`;

export const Title = styled.div`
  padding-top: 30px;
  text-align: center;
  margin: 10px 65px 0px 65px;
  font-size: 36px;
  font-weight: 300;
`;

export const Button = styled.button`
  width: 100px;
`;

export const ButtonContainer = styled.div`
  display: flex;
  align-items: center;
  margin: auto;
  margin-top: 50px;
`;
