import React from 'react'
import { Container } from './styles'

const SideBarItem = ({ Icon, Text }) => {
  return (
    <Container>
      <Icon />
      {Text}
    </Container>
  )
}

export default SideBarItem