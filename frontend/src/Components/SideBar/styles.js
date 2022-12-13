import styled from 'styled-components';

export const Container = styled.div`
  background-color: #171923;
  position: fixed;
  height: 100%;
  top: 0px;
  left: 0px;
  width: 250px;
  left: ${props => props.sidebar ? '0' : '-100%'};
  

  > svg {
    position: fixed;
    color: white;
    width: 30px;
    height: 30px;
    margin-top: 32px;
    margin-left: 32px;
    cursor: pointer;
  }

  
`;

export const Content = styled.div`
  margin-top: 100px;
`;

export const Title = styled.div`
  font-size: 36px;
  font-weight: 300;
  margin-bottom: 20px;
  padding-left: 20px;
  color: white;
`;