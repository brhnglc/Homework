from mininet.topo import Topo
from mininet.node import OVSKernelSwitch
from mininet.node import Controller,RemoteController
from mininet.net import Mininet
from mininet.cli import CLI
from mininet.node import Host
from mininet.link import TCLink
def ntwrk():

    net = Mininet(topo=None,build=False,
                   ipBase='10.0.0.0/8')
    
    c0=net.addController(name='c0',
                      controller=RemoteController,
                      ip='127.0.0.1',
                      protocol='tcp',
                      port=6653)
    s1 = net.addSwitch('s1',cls=OVSKernelSwitch)
    s2 = net.addSwitch('s2',cls=OVSKernelSwitch)
    s3 = net.addSwitch('s3',cls=OVSKernelSwitch) 
    s4 = net.addSwitch('s4',cls=OVSKernelSwitch)
    s5 = net.addSwitch('s5',cls=OVSKernelSwitch)
    s6 = net.addSwitch('s6',cls=OVSKernelSwitch)
    s7 = net.addSwitch('s7',cls=OVSKernelSwitch)
    s8 = net.addSwitch('s8',cls=OVSKernelSwitch)
    
    
    h1 = net.addHost('h1',cls=Host,ip='10.0.0.1',mac='00:00:00:00:00:01', defaultRoute=None)
    h2 = net.addHost('h2',cls=Host,ip='10.0.0.2',mac='00:00:00:00:00:02', defaultRoute=None)
     
    net.addLink(h1,s1,cls=TCLink)
    net.addLink(h1,s2,cls=TCLink)
    net.addLink(s1,s3,cls=TCLink)
    net.addLink(s2,s3,cls=TCLink)
    net.addLink(s1,s4,cls=TCLink)
    net.addLink(s2,s5,cls=TCLink)
    net.addLink(s3,s4,cls=TCLink)
    net.addLink(s3,s5,cls=TCLink)
    net.addLink(s4,s6,cls=TCLink)
    net.addLink(s4,s8,cls=TCLink)
    net.addLink(s5,s6,cls=TCLink)
    net.addLink(s5,s7,cls=TCLink)
    net.addLink(s7,h2,cls=TCLink)
    net.addLink(s8,h2,cls=TCLink) 
   
 
    net.build()
    c0.start()
    net.get("s1").start([c0])
    net.get("s2").start([c0])
    net.get("s3").start([c0])
    net.get("s4").start([c0])
    net.get("s5").start([c0])
    net.get("s6").start([c0])
    net.get("s7").start([c0])
    net.get("s8").start([c0])
    

    CLI(net)
    net.stop()
    
    
if _name== "main_":
    ntwrk()