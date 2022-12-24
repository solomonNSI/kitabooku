import React from "react";
import styled from "styled-components";

export const Background = styled.div`
  align-self: flex-start;
  width: 70%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #dddddd;
  margin-top: 150px;
  height: auto;
`;

export const RadioBox = styled.div`
  height: 1.125rem;
  width: 1.125rem;
  border: 1px solid #b9bdcf;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  margin-right: 0.4rem;
  transition: all 1s ease-out;
  padding: 2px;

  &::after {
    content: "";
    width: 100%;
    height: 100%;
    display: block;
    background: #333333;
    border-radius: 50%;
    cursor: pointer;
    transform: scale(0);
  }
`;

export const Container = styled.div`
  
  display: inline-flex;
  height: 60px;
  width: 420px;
  margin-top: 10px; 
  border-radius: 8px;
  justify-content: space-around;
  flex-direction: row;
`;



export const Label = styled.label`
  display: flex;
  align-items: center;
`;

export const Paragraph = styled.p`
  color: #333333;
  font-size: 16px;
  font-family: "Poppins", sans-serif;
  font-weight: 500;
`;

export const Input = styled.input`
  display: none;
  &:checked + ${RadioBox} {
      &::after {
        transform: scale(1);
      }
    }
`;

export const SignUpInside = styled.div`
  display: flex;
  align-items: center;
  justify-content: flex-start;
  flex-direction: column;
  width: auto;
  height: auto;
  border-radius: 8px;
  padding: 80px 0px;
  input {
    background-color: #ffffff;
    height: 55px;
    border-radius: 8px;
    width: 400px;
    border: none;
    margin-top: 25px;
    font-size: 20px;
    padding-left: 20px;
  }
  .signUpButton {
    cursor: pointer;
    background-color: #333333;
    height: 55px;
    border-radius: 8px;
    width: 150px;
    border: none;
    margin-top: 50px;
    font-size: 20px;
    font-weight: 400;
    color: white;
    align-self: flex-end;
  }
  .loginButton {
    cursor: pointer;
    background: none;
    height: 50px;
    border-radius: 8px;
    width: auto;
    border: none;
    margin-top: 20px;
    font-size: 20px;
    font-weight: 300;
    color: #333333;
    align-self: flex-end;
    strong {
      font-weight: 500;
    }
  }
`;

export const Title = styled.div`
  font-size: 36px;
  font-weight: 300;
  margin-bottom: 20px;
`;