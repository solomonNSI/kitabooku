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

export const FeedInside = styled.div`
  display: flex;
  align-items: center;
  justify-content: flex-start;
  flex-direction: column;
  width: auto;
  height: auto;
  border-radius: 8px;
  padding: 80px 0px;
  .item {
    background-color: #ffffff;
    height: 55px;
    border-radius: 8px;
    width: 400px;
    border: none;
    margin-top: 25px;
    font-size: 20px;
    padding-left: 20px;
  }
  .filterButton {
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
`;

export const Title = styled.div`
  font-size: 36px;
  font-weight: 300;
  margin-bottom: 20px;
  
`;