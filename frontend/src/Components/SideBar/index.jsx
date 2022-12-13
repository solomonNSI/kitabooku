import React from 'react'
import { Container, Content } from './styles'
import { 
  FaHome, 
  FaRegSun, 
  FaChartBar,
  FaList,
  FaBook,
  FaConnectdevelop
} from 'react-icons/fa'

import SideBarItem from '../SideBarItem'

const SideBar = ({ active }) => {

  return (
    <Container sidebar={active}>
      
      <Content>
        <SideBarItem Icon={FaHome} Text="Feed" />
        <SideBarItem Icon={FaList} Text="Lists" />
        <SideBarItem Icon={FaChartBar} Text="Leaderboard" />
        <SideBarItem Icon={FaBook} Text="Buy e-books" />
        <SideBarItem Icon={FaConnectdevelop} Text="Forums" />
        <SideBarItem Icon={FaRegSun} Text="Settings" />
      </Content>
    </Container>
  )
}

export default SideBar