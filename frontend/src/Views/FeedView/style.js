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
  
  justify-content: flex-start;
  flex-direction: column;
  width: 800px;
  height: auto;
  border-radius: 8px;
  padding: 80px 0px;
  
  .item {
    background-color: #ffffff;
    height: 55px;
    border-radius: 8px;
    width: 440px;
    border: none;
    margin-top: 25px;
    font-size: 20px;
    padding-left: 20px;
  }

`;

export const Title = styled.div`
  font-size: 36px;
  font-weight: 400;
  margin: 20px 0px;
`;


export const Container = styled.div`  
  display: inline-flex;
  height: 60px;
  width: 800px;
  margin: 10px 0px; 
  border-radius: 8px;
  justify-content: space-between;
  flex-direction: row;
`;

export const FilterButton = styled.div`
  display: flex;
  background-color: #1A202C; 
  font-size: 20px;
  color: white;
  padding: 10px;
  cursor: pointer;
  border-radius: 10px;
  margin: auto 0px;
  width: 200px;

  &:hover {
    background-color: grey;
  }
`;

export const Card = styled.div`  
  display: inline-flex;
  background-color: #a1a4a8;
  height: wrap;
  width: 800px;
  margin: 10px 0px; 
  border-radius: 8px;
  justify-content: space-between;
  flex-direction: column;
`;

export const CardUsername = styled.div`  
  display: inline-flex;
  background-color: #ededed;
  height: 20px;
  width: auto;
  padding: 12px; 
  border-radius: 8px;
  justify-content: space-between;
  flex-direction: column;

`;

export const CardRating = styled.div`  
  display: inline-flex;
  background-color: #a1a4a8;
  height: 20px;
  width: auto;
  margin: 8px 12px;
  border-radius: 8px;
  justify-content: space-between;
  flex-direction: column;
`;

export const CardReviewTitle = styled.div`  
  display: inline-flex;
  background-color: #a1a4a8;
  height: 20px;
  width: auto;
  font-size: 24px;
  margin: 8px 12px;
  
  justify-content: space-between;
  flex-direction: column;
`;

export const CardReview = styled.div`  
  display: inline-flex;
  background-color: #a1a4a8;
  height: auto;
  width: auto;
  font-size: 16px;
  margin: 8px 12px;
  
  justify-content: space-between;
  flex-direction: column;
`;



export const CardBookContainer = styled.div`  
  display: inline-flex;
  height: wrap;
  width: 800px;
  margin: 10px 0px; 
  border-radius: 8px;
  justify-content: start;
  flex-direction: row;

  > svg {
    color: black;
    width: 40px;
    height: 40px;
    margin-left: 12px;
    cursor: pointer;
  }
`;

export const CardBookNameAuthor = styled.div`  
  display: inline-flex;
  height: wrap;
  width: auto;
  border-radius: 8px;
  justify-content: start;
  flex-direction: column;
`;

export const CardBookName = styled.div`  
  display: inline-flex;
  background-color: #a1a4a8;
  width: auto;
  font-size: 16px;
  margin: 0px 12px;
`;

export const CardBookAuthor = styled.div`  
  display: inline-flex;
  background-color: #a1a4a8;
  height: 20px;
  width: auto;
  font-size: 16px;
  margin: 0px 12px;
`;



